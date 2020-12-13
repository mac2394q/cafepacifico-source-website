<?php

echo "

<div class='col-md-6 col-sm-12'>

    <table class='table cart-total'>

        <tbody>

            <tr>

                <th

                    class='padding-two text-right no-padding-right text-uppercase font-weight-600 letter-spacing-2 text-small xs-no-padding'>

                    Numero de personas en la reserva</th>

                <td

                    class='padding-two text-uppercase text-right no-padding-right font-weight-600 black-text xs-no-padding'>

                    ".$_POST['npersonas']."</td>

            </tr>

            <tr>

                <th

                    class='padding-two text-right no-padding-right text-uppercase font-weight-600 letter-spacing-2 text-small xs-no-padding'>

                    Reserva para evento</th>

                <td

                    class='padding-two text-uppercase text-right no-padding-right font-weight-600 black-text text-small xs-no-padding'>

                    ".$_POST['tipoReserva']."</td>

            </tr>

            <tr>

                <th

                    class='padding-two text-right no-padding-right text-uppercase font-weight-600 letter-spacing-2 text-small xs-no-padding'>

                    Tipo de servicio</th>

                <td

                    class='padding-two text-uppercase text-right no-padding-right font-weight-600 black-text xs-no-padding'>

                    ".$_POST['servicio']."</td>

            </tr>

            <tr>

                <th

                    class='padding-two text-right no-padding-right text-uppercase font-weight-600 letter-spacing-2 text-small xs-no-padding'>

                    Fecha  verificada</th>

                <td

                    class='padding-two text-uppercase text-right no-padding-right font-weight-600 black-text xs-no-padding'>

                    ".$_POST['fecha']."</td>

            </tr>

            <tr>

                <th

                    class='padding-two text-right no-padding-right text-uppercase font-weight-600 letter-spacing-2 text-small xs-no-padding'>

                    hora verificada</th>

                <td

                    class='padding-two text-uppercase text-right no-padding-right font-weight-600 black-text xs-no-padding'>

                    ".$_POST['horario']."</td>

            </tr>

            <tr>

                <td colspan='2' class='padding-one no-padding-right xs-no-padding'>

                    <hr>

                </td>

            </tr>

            <tr class='total'>

                <th

                    class='padding-two text-uppercase text-right no-padding-right font-weight-600 text-large xs-no-padding'>

                    Valor a pagar</th>

                <td

                    class='padding-two text-uppercase text-right no-padding-right font-weight-600 black-text text-large no-letter-spacing xs-no-padding'>

                    $0</td>

            </tr>

            <tr>

                <td colspan='2' class='padding-one no-padding-right xs-no-padding'>

                    <hr class='no-margin-bottom'>

                </td>

            </tr>

        </tbody>

    </table>

    <div id='estadoReserva'></div>

    <button id='registrarReserva'

        class='highlight-button-black-background btn no-margin pull-right checkout-btn xs-width-100 xs-text-center'>Generar reserva</button>

</div>";





?>