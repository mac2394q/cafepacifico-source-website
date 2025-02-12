/*=========================================================================================
    File Name: display-information.js
    Description: display information mapael vetor map example
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Display information mapael vetor map
// -------------------------------------

$(window).on("load", function(){

    $(".display-information").mapael({
        map: {
            name: "usa_states",
            defaultArea: {
                attrs: {
                    fill: "#FF847C",
                    stroke: "#FFFFFF"
                },
                attrsHover: {
                    fill: "#99B898"
                }
            },
            defaultPlot: {
                size: 30,
                eventHandlers: {
                    mouseover: function (e, id, mapElem, textElem, elemOptions) {
                        if (typeof elemOptions.myText != 'undefined') {
                            $('.myText span').html(elemOptions.myText).css({display: 'none'}).fadeIn('slow');
                        }
                    }
                }
            }
        },
        plots: {
            'ny': {
                latitude: 40.717079,
                longitude: -74.00116,
                tooltip: {content: "New York"},
                myText: "Curabitur imperdiet velit eu urna aliquet, vitae aliquam nisi molestie. Etiam in eleifend lectus. Ut id velit dignissim, tristique urna at, sodales massa. Ut ultrices mi at varius elementum. Integer id mi sagittis, congue orci a, tristique neque. Maecenas varius rutrum dui eget lacinia. Suspendisse rutrum, enim auctor ullamcorper vestibulum, enim justo suscipit velit, in pretium dui elit et nisi. Vivamus hendrerit ex tempus, consectetur est eu, maximus quam. Sed congue nunc sed dapibus sagittis. "
            },
            'an': {
                latitude: 61.2108398,
                longitude: -149.9019557,
                tooltip: {content: "Anchorage"},
                myText: "Nulla facilisi. Morbi eu tempor purus, ut pretium ante. Ut hendrerit auctor nisl a vehicula. Sed bibendum mattis magna, ut molestie libero imperdiet ac. Donec ac turpis facilisis, faucibus lorem feugiat, tincidunt lacus. Donec euismod, sem euismod sagittis elementum, nulla augue mattis mauris, tincidunt vestibulum purus libero vel tellus. Suspendisse id condimentum dolor, a interdum odio. Donec luctus sed mi at lacinia. "
            },
            'sf': {
                latitude: 37.792032,
                longitude: -122.394613,
                tooltip: {content: "San Francisco"},
                myText: "Duis id sapien a lorem varius fringilla. Pellentesque leo mauris, pharetra in scelerisque ut, lacinia vitae libero. Quisque eleifend sagittis ipsum eget venenatis. Fusce enim justo, iaculis varius neque ut, mollis suscipit purus. Curabitur nisi risus, pellentesque non arcu in, varius suscipit tortor. Morbi eget blandit quam. Pellentesque quis nunc vel sem porttitor tempor. Maecenas et ullamcorper ipsum, ac aliquam arcu. "
            },
            'pa': {
                latitude: 19.493204,
                longitude: -154.8199569,
                tooltip: {content: "Pahoa"},
                myText: "Phasellus sit amet nulla quis leo pellentesque euismod. Cras vestibulum vulputate est, et volutpat dolor eleifend vel. Cras rhoncus ac massa vitae efficitur. Sed cursus bibendum leo, nec pellentesque diam fringilla non. Nam rhoncus tellus sapien, eget ornare ex luctus sed. Nunc at ligula odio. Quisque mollis, magna et aliquam posuere, sem turpis luctus urna, ac mollis arcu mi non neque. Cras sed rhoncus lorem. Sed bibendum, quam at porttitor convallis, sapien ex suscipit neque, et pulvinar est velit a dui. Curabitur tellus urna, porttitor sed eleifend non, ullamcorper id ligula. Aenean ac ligula gravida sem mollis consequat. Maecenas at felis est. Praesent commodo nunc ut arcu sollicitudin efficitur at vel mi. "
            },
            'la': {
                latitude: 34.025052,
                longitude: -118.192006,
                tooltip: {content: "Los Angeles"},
                myText: "Phasellus mattis ligula elementum elit commodo placerat. Fusce maximus accumsan tristique. Mauris eu enim tortor. Aliquam non quam vitae elit sodales pharetra quis ac tortor. In ullamcorper hendrerit sem, ut suscipit massa dignissim non. Maecenas sed dui varius, tristique velit ac, bibendum ex. Phasellus tortor elit, luctus non accumsan sit amet, convallis non purus. Mauris lobortis tempor ex, vel ullamcorper tellus pharetra sed. "
            },
            'dallas': {
                latitude: 32.784881,
                longitude: -96.808244,
                tooltip: {content: "Dallas"},
                myText: "Phasellus vitae sapien in turpis tempus pellentesque. Morbi ligula libero, facilisis scelerisque ex a, pellentesque luctus metus. Morbi sodales, velit sed ultricies maximus, lectus ipsum pulvinar elit, non facilisis ante tortor ac mauris. Mauris tempus vulputate vulputate. Donec consequat dolor lorem, rhoncus pharetra libero condimentum nec. Nunc in metus eros. Vivamus elementum imperdiet rhoncus. Aliquam suscipit nec sapien vitae blandit. Duis ultricies lacus nec ullamcorper eleifend. Nunc ut dignissim mauris. Sed sed tortor ultrices, rhoncus metus in, placerat urna. "
            },
            'miami': {
                latitude: 25.789125,
                longitude: -80.205674,
                tooltip: {content: "Miami"},
                myText: "Suspendisse quis semper nisi, id ornare lectus. Nulla ac aliquam metus. Pellentesque molestie ligula quis lacus maximus, id eleifend dolor tincidunt. Mauris convallis purus vel eros rhoncus venenatis. Pellentesque mollis consectetur ipsum sed pharetra. In pharetra, mi nec placerat vestibulum, mi massa sodales arcu, nec commodo orci elit in enim. Praesent ante nisi, venenatis eget elementum et, cursus sed neque. Duis consequat dignissim nisl. In ut nisl orci. Pellentesque quis orci id lorem interdum hendrerit sed in erat. Ut felis risus, feugiat id posuere id, rhoncus nec dui. Nullam ut pretium diam. Nulla facilisi. Praesent erat neque, placerat non dapibus sed, gravida in erat. "
            },
            'washington': {
                latitude: 38.905761,
                longitude: -77.020746,
                tooltip: {content: "Washington"},
                myText: "Praesent eu felis quis purus accumsan hendrerit. Mauris iaculis, eros eget cursus bibendum, est elit euismod enim, sit amet dignissim diam nisl in massa. Proin rhoncus justo dolor, sed fermentum augue pellentesque quis. Vivamus rutrum urna sapien, nec dignissim lectus varius ac. Fusce sed semper turpis. Integer efficitur ipsum eget est fringilla iaculis. Nam pellentesque tellus vitae lectus maximus varius. Proin convallis lorem nulla, sed rhoncus sapien molestie non. Cras dapibus turpis malesuada risus cursus, sit amet placerat lacus semper. Nam consequat leo at libero congue, sit amet dignissim lacus pellentesque. Quisque mollis aliquam libero at ultricies. Praesent facilisis augue eu auctor iaculis. Praesent a varius ligula, nec faucibus urna. Etiam id auctor felis. Praesent turpis leo, fermentum eu sapien eu, pulvinar bibendum lectus. Vestibulum dapibus, nisi quis tristique tempor, augue est posuere odio, vitae blandit elit nulla sit amet justo. "
            },
            'seattle': {
                latitude: 47.599571,
                longitude: -122.319426,
                tooltip: {content: "Seattle"},
                myText: "Donec ultrices, augue vitae convallis malesuada, elit elit venenatis arcu, in rutrum lectus orci at erat. Nam id orci nunc. Suspendisse cursus massa vitae dignissim fermentum. Nullam velit lectus, congue at ultricies eget, varius in felis. In auctor mattis imperdiet. Maecenas feugiat sem ac ligula interdum maximus. Sed ex lectus, pellentesque in mi id, luctus viverra quam. Duis at laoreet erat. Pellentesque quis lorem aliquam neque fermentum malesuada id at nulla. Etiam egestas diam et porttitor tristique. "
            }
        }
    });

});