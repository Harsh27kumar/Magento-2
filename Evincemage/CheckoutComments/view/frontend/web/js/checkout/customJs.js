define(
                        [
                            'ko',
                            'jquery',
                            'uiComponent',
                            'mage/url',
                            'Magento_Checkout/js/model/cart/totals-processor/default',
                            'Magento_Checkout/js/model/cart/cache'
                        ],
                        function (ko, $, Component,url,defaultTotal, cartCache) {
                            'use strict';
                            return Component.extend({
                                defaults: {
                                    template: 'Evincemage_CheckoutComments/checkout/customCheckbox'
                                },
                                initObservable: function () {
                    
                                    this._super()
                                        .observe({
                                            CheckVals: ko.observable(false)
                                        });
                                    var checkVal=0;
                                    self = this;
                                    this.CheckVals.subscribe(function (newValue) {
                                        var linkUrls  = url.build('checkoutcomments/checkout/saveInQuote');
                                        if(newValue) {
                                            checkVal = 1;
                                        }
                                        else{
                                            checkVal = 0;
                                        }
                                        $.ajax({
                                            showLoader: true,
                                            url: linkUrls,
                                            data: {checkVal : checkVal},
                                            type: "POST",
                                            dataType: 'json'
                                        }).done(function (data) {
                                            console.log('success');
                    
                                        });
                                        cartCache.set('totals',null);
                                        defaultTotal.estimateTotals();
                                    });
                                    return this;
                                }
                            });
                        }
                    );