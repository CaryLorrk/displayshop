angular.module("DisplayShop", [
    "ngAnimate",
    "ngSanitize",
    "ui.bootstrap",
    "ui.router"
])
.run(
    ['$rootScope', '$state', '$stateParams',
    function($rootScope, $state, $stateParams) {
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
    }]
)
.animation('.page-fade', function() {
    return {
        enter: function(element, done) {
            element.css('opacity', 0);
            $(element).animate({opacity: 1}, 700, done);
        }
    };
})
.animation('.lightbox-img', function() {
    return {
        removeClass: function(element, className, done) {
            element.css('opacity', 0);
            $(element).animate({opacity: 1}, 100, done());
        }
    };
})
.config(function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider
    .when('/about', '/about/group')
    .when('/products', '/products/new')
    .when('/gallery', '/gallery/index')
    .when('/news', '/news/event')
    .otherwise("/");

    $stateProvider
    .state("home", {
        url: "/",
        templateUrl: function($stateParams) {
            return "index.php/home";
        }
    })
    .state("about", {
        url: "/about",
        templateUrl: function($stateParams) {
            return "index.php/about";
        }
    })
    .state("about.list", {
        url: "/:tab",
        templateUrl: function($stateParams) {
            return "index.php/about/" + $stateParams.tab;
        },
        controller: "AboutController"
    })
    .state("products", {
        url: "/products",
        templateUrl: function ($stateParams){
            return "index.php/products";
        },
        controller: "ProductsController"
    })
    .state("products.new", {
        url: "/new",
        templateUrl: "index.php/products/new"
    })
    .state("products.list", {
        url: "/:tab",
        templateUrl: function($stateParams) {
            return "index.php/products/" + $stateParams.tab;
        }
    })
    .state("gallery", {
        url: "/gallery",
        templateUrl: function($stateParams) {
          return "index.php/gallery";
        },
        controller: "GalleryController"
    })
    .state("gallery.index", {
         url: "/index",
         templateUrl: function($stateParams) {
             return "index.php/gallery/index";}
    })
    .state("gallery.list", {
        url: "/:tab",
        templateUrl: function($stateParams) {
             return "index.php/gallery/" + $stateParams.tab;
        }
    })
    .state("news", {
        url: "/news",
        templateUrl: function($stateParams) {
            return "index.php/news";
        }
    })
    .state("news.list", {
        url: "/:tab",
        templateUrl: function($stateParams) {
            return "index.php/news/" + $stateParams.tab;
        },
        controller: "NewsController"
    })
    .state("inquiry", {
        url: "/inquiry",
        templateUrl: function($stateParams) {
            return "index.php/inquiry";
        },
        controller: "InquiryController"
    })
    .state("contact", {
        url: "/contact",
        templateUrl: function($stateParams) {
            return "index.php/contact";
        }
    })
    .state("youtube", {
        url: "/youtube",
        templateUrl: function($stateParams) {
            return "index.php/youtube";
        }
    });
})
.controller("LightBoxController", function($scope, $modalInstance,
                                           $timeout, items, idx) {
    $scope.items = items;
    $scope.idx = idx;
    $scope.path = [];
    $scope.loadimg = function(idx) {
        if (idx >= 0 || idx < $scope.items.length) {
            if ($scope.items[idx]) {
                $scope.path[idx] = "static/img/normal/" + 
                    $scope.items[idx].id + ".jpg";
            }
        }
    };
    $scope.previous = function() {
        if ($scope.idx > 0) {
            $scope.loadimg($scope.idx-1);
            var e = $("#lightbox-img-" + $scope.idx);
            e.animate({opacity: 0}, 100, function() {
                $scope.$apply(function() {
                    $scope.idx--;
                    $scope.loadimg($scope.idx);
                    $scope.loadimg($scope.idx-1);
                });
            });
        }        
    };
    $scope.next = function() {
        if ($scope.idx < $scope.items.length - 1) {
            $scope.loadimg($scope.idx+1);
            var e = $("#lightbox-img-" + $scope.idx);
            e.animate({opacity: 0}, 100, function() {
                $scope.$apply(function() {
                    $scope.idx++;
                    $scope.loadimg($scope.idx);
                    $scope.loadimg($scope.idx+1);
                });
            });
        }
    };
    $scope.close = function() {
        $modalInstance.dismiss();
    };
    $scope.loadimg($scope.idx);
    $scope.loadimg($scope.idx+1);
    $scope.loadimg($scope.idx-1);
})
.controller("BaseController", function($scope, $location, $rootScope,
                                       $http, $templateCache, $timeout) {
    $scope.getResponsiveClass = function () {
        if (window.screen.width < 768) {
            return "xs";
        } 
        if (window.screen.width < 992) {
            return "sm";
        } 
        if (window.screen.width < 1200) {
            return "md";
        } 
        return "lg";
    };
    $scope.navCollapsed = true;
    $scope.isActive = function(location) {
        return location === $location.path();
    };
    $scope.toTop = function() {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    };
    $rootScope.changeState = function(id, state, stateParams) {
        var redirection = {
            'about': {
                url: '/about/group',
                state: 'about.group'
            },
            'products': {
                url: '/products/new', 
                state: 'products.group'
            },
            'gallery': {
                url: '/gallery/index',
                state: 'products.group'
            },
            'news': {
                url: '/news/event',
                state: 'news.event'
            }
        };
        var stateConfig = $rootScope.$state.get(state);
        var templateUrl = stateConfig.templateUrl(stateParams);

        var rState = redirection[state];
        var rTemplateUrl  = "";
        if (rState !== undefined) {
            rTemplateUrl = $rootScope.$state.get(rState.state);
        }
        var checkReady = function() {
            $timeout(function() {
                if ($templateCache.get(templateUrl) === undefined ||
                    (rState !== undefined &&
                    $templateCache.get(rTemplateUrl) === undefined)) {
                    checkReady();
                }
            },50, false);
        };
        if (rState !== undefined && 
            $templateCache.get(rTemplateUrl)) {
            $http({
                method: "GET",
                url: rTemplateUrl
            })
            .success(function(data) {
                $templateCache.put(rTemplateUrl, data);
            })
            .error(function() {
                $templateCache.put(rTemplateUrl,
                   "<div class='alert alert-danger'>" +
                   "<p class='text-center'>" +
                   "Faild to load page. Please retry or contact us" +
                   "</p>"+
                   "</div>");
            });

        }
        if ($templateCache.get(templateUrl) === undefined) {
            $http({
                method: "GET",
                url: templateUrl
            })
            .success(function(data) {
                $templateCache.put(templateUrl, data);
            })
            .error(function() {
                $templateCache.put(templateUrl,
                   "<div class='alert alert-danger'>" +
                   "<p class='text-center'>" +
                   "Faild to load page. Please retry or contact us" +
                   "</p>"+
                   "</div>");
            });
        }
        if (!$scope.$state.includes(state, stateParams)) {
            $("#"+id).animate({opacity: 0}, 300, function() {
                checkReady();
                $scope.$state.go(state, stateParams);
            });
        }
    };
})
.controller("AboutController", function($scope) {
    $scope.tabs = [
        {
            "id": "group",
            "text": "Kupo Group"
        },
        {
            "id": "polestar",
            "text": "Kupo Display (Polestar)"
        },
        {
            "id": "contact",
            "text": "Contact"
        }
    ];
})
.controller("ProductsController", function($scope, $rootScope, $location,
                                           $anchorScroll, $modal) {
    $scope.itemsInit = function(items) {
        $scope.items = items;
    };
    $scope.groups = [
        {
            "id": "pillar",
            "text": "Pillar System"
        },
        {
            "id": "super_joint",
            "text": "Super Joint System"
        },
        {
            "id": "kube",
            "text": "Kube System"
        },
        {
            "id": "x-bone",
            "text": "X-Bone"
        },
        {
            "id": "spotlight",
            "text": "Spotlight"
        }
    ];
    $scope.kupoles = [
        {
            "id": "kupole",
            "text": "Kupole"
        },
        {
            "id": "kupole.500",
            "text": "500 series"
        },
        {
            "id": "kupole.600",
            "text": "600 series"
        },
        {
            "id": "kupole.700",
            "text": "700 series"
        },
        {
            "id": "kupole.800",
            "text": "800 series"
        },
        {
            "id": "kupole.900",
            "text": "900 series"
        },
        {
            "id": "kupole.others",
            "text": "Others series"
        }
    ];
    $scope.dropdown_check = function(collection) {
        var i;
        for (i = collection.length - 1; i >= 0; i--) {
            if ($rootScope.$state.includes("products.list",
                                           {tab: collection[i].id }))
            {
                return true;
            }
        }
        return false;
    };
    $scope.open_lightbox = function(idx) {
        $modal.open({
            templateUrl: "index.php/lightbox",
            controller: "LightBoxController",
            windowClass: 'lightbox',
            resolve: {
                items: function() {
                    return $scope.items;
                },
                idx: function() {
                    return idx;
                }
            }
        });
    };

    $scope.jump_to_item = function(item) {
        var listener = $rootScope.$on('$stateChangeSuccess', function() {
            $location.hash(item.id);
            $anchorScroll();
            listener();
        });
        $rootScope.changeState('products-ui-view',
                               'products.list', {tab: item.group});
    };
})
.controller("GalleryController", function($scope, $rootScope, $modal) {
    $scope.items = {};
    $scope.itemsInit = function(items) {
        $scope.items = items;
    };
    $scope.projects = [
        {
            "id": "beauty-salon",
            "text": "Beauty Salon"
        },
        {
            "id": "bike-shop",
            "text": "Bike Shop"
        },
        {
            "id": "boutique",
            "text": "Boutique"
        },
        {
            "id": "clothing-store",
            "text": "Clothing Store"
        },
        {
            "id": "promotion-kit",
            "text": "Promotion Kit"
        },
        {
            "id": "others",
            "text": "Others"
        }
    ];
    $scope.sketches = [
        {
            "id": "kupole-system",
            "text": "Kupole System"
        },
        {
            "id": "bike-fixture",
            "text": "Bike Fixture"
        },
        {
            "id": "pillar-system",
            "text": "Pillar System"
        },
        {
            "id": "super-joint-system",
            "text": "Super Joint System"
        },
        {
            "id": "kube-system",
            "text": "Kube System"
        },
        {
            "id": "x-bone",
            "text": "X-Bone"
        }
    ];

    $scope.dropdown_check = function(collection) {
        var i;
        for (i = collection.length - 1; i >= 0; i--) {
            if ($rootScope.$state.includes("gallery.list",
                                           {tab: collection[i].id }))
            {
                return true;
            }
        }
        return false;
    };

    $scope.open_lightbox = function(idx) {
        $modal.open({
            templateUrl: "index.php/lightbox",
            controller: "LightBoxController",
            windowClass: 'lightbox',
            resolve: {
                items: function() {
                    return $scope.items;
                },
                idx: function() {
                    return idx;
                }
            }
        });
    };
})
.controller("NewsController", function($scope) {
    $scope.test = "ohmygod";
    $scope.tabs = [
        {
            "id": "event",
            "text": "Event"
        },
        {
            "id": "e-news",
            "text": "E-News"
        }
    ];
})
.controller("InquiryController", function($scope, $http,
                                          $location, $anchorScroll) {
    $scope.join_dict = function(dict) {
        var attr;
        var arr = [];
        for (attr in dict) {
            if (dict[attr] !== "") {
                arr.push(dict[attr]);
            }
        }
        return arr.join();
    };
    $scope.reset = function() {
        $scope.checkId = -1;
        $scope.nowId = -1;
        $scope.wrong_captcha = false;
        $scope.send = "Send";
        $scope.submitted = false;
        $scope.alert = {type:"", text:""};
        $scope.inputs = {
            "name":{"text":"Name"},
            "email":{"text":"E-Mail"},
            "company":{"text":"Company"},
            "phone":{"text":"Phone Number"},
            "fax":{"text":"Fax Number"},
            "website":{"text": "Website"},
            "country":{"text": "Country"},
            "city":{"text": "City"},
            "addr":{"text": "Address"},
            "profession":{"text":"Profession"},
            "specially":{"text":"Area of Specially"},
            "comment":{"text": "Comment"},
            "captcha":{"text":"Security Code"}
        };
        $scope.profession = {
            "dstributor":"",
            "dealer":"",
            "end_user":"",
            "other":""
        };
        $scope.specially = {
            "shop":"",
            "chain_store":"",
            "space_design":"",
            "other":""
        };
    };
    $scope.checking = function() {
        return $scope.nowId !== $scope.checkId;
    };
    $scope.submit = function() {
        $scope.submitted = true;
        if ($scope.form.$invalid) {
            $scope.alert.text = "Please check and fix errors in the form.";
            $scope.alert.type = "alert-danger";
            $location.hash("content");
            $anchorScroll();
        } else {
            $scope.send = "Sending";
            $scope.inputs.profession.content =
                $scope.join_dict($scope.profession);
            $scope.inputs.specially.content =
                $scope.join_dict($scope.specially);
            $http({
                method: "POST",
                url: "index.php/sendemail",
                data: $scope.inputs
            })
            .success(function() {
                $scope.alert.text = 
                    "We have received your inquiry and will contact you soon. Thank you for your interest.";
                $scope.alert.type = "alert-success";
                document.getElementById('captcha').src =
                    'securimage/securimage_show.php?' + Math.random();
                $scope.send = "Send";
                $location.hash("content");
                $anchorScroll();
            })
            .error(function(data, status) {
                if (status === 402) {
                    $scope.alert.text =
                        "Security code is wrong. Please enter the correct text.";
                    $scope.alert.type = "alert-danger";
                    $scope.wrong_captcha = true;
                    $location.hash("content");
                    $anchorScroll();
                } else {
                    $scope.alert.text =
                        "There are some problems with our system. Please contact us by the company information.";
                    $scope.alert.type = "alert-danger";
                    $location.hash("content");
                    $anchorScroll();
                }
                $scope.send = "Send";
            });
        }
    };
    $scope.check_captcha = function() {
        if (!$scope.inputs.captcha.content) {
            return;
        }
        var id = ++$scope.checkId; 
        $http({
            method: "POST",
            url: "index.php/securimage/securimage_ajax",
            data: {
                'input': $scope.inputs.captcha.content,
                'id': id
            }
        })
        .success(function(data) {
            if (data.id > $scope.nowId) {
                $scope.nowId = data.id;
                $scope.wrong_captcha = false;
            }
        })
        .error(function(data) {
            if (data.id > $scope.nowId) {
                $scope.nowId = data.id;
                $scope.wrong_captcha = true;
            }
        });
    };
    $scope.reset();
});
