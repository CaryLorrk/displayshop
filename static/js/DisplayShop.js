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
            var pos = element.css('position');
            element.css('position', 'absolute');
            element.css('opacity', 0);
            $(element).animate({opacity: 1}, 500, function() {
                element.css('position', pos);
                done();
            });
        },
        leave: function(element, done) {
            var pos = element.css('position');
            element.css('position', 'relative');
            element.css('opacity', 1);
            $(element).animate({opacity: 0}, 500, function() {
                element.css('position', pos);
                done();
            });
        }
    };
})
.animation('.lightbox-img', function() {
    return {
        removeClass: function(element, className, done) {
            element.css('opacity', 0);
            $(element).animate({opacity: 1}, 300, done());
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
        templateUrl: "index.php/home"
    })
    .state("about", {
        url: "/about",
        templateUrl: "index.php/about"
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
        templateUrl: "index.php/products",
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
        templateUrl: "index.php/gallery",
        controller: "GalleryController"
    })
    .state("gallery.index", {
         url: "/index",
         templateUrl: "index.php/gallery/index"
    })
    .state("gallery.list", {
        url: "/:tab",
        templateUrl: function($stateParams) {
             return "index.php/gallery/" + $stateParams.tab;
        }
    })
    .state("news", {
        url: "/news",
        templateUrl: "index.php/news"
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
        templateUrl: "index.php/inquiry",
        controller: "InquiryController"
    })
    .state("contact", {
        url: "/contact",
        templateUrl: "index.php/contact"
    })
    .state("youtube", {
        url: "/youtube",
        templateUrl: "index.php/youtube"
    });
})
.controller("LightBoxController", function($scope, $modalInstance,
                                           items, idx) {
    $scope.items = items;
    $scope.idx = idx;
    $scope.path = [];
    $scope.loadimg = function(idx) {
        $scope.path[idx] = "static/img/normal/" + $scope.items[idx].id + ".jpg";
    };
    $scope.previous = function() {
        if ($scope.idx > 0) {
            $scope.loadimg($scope.idx-1);
            var e = $("#lightbox-img-" + $scope.idx);
            e.animate({opacity: 0}, 300, function() {
                $scope.$apply(function() {
                    $scope.idx--;
                    $scope.loadimg($scope.idx);
                });
            });
        }
    };
    $scope.next = function() {
        if ($scope.idx < $scope.items.length - 1) {
            $scope.loadimg($scope.idx+1);
            var e = $("#lightbox-img-" + $scope.idx);
            e.animate({opacity: 0}, 300, function() {
                $scope.$apply(function() {
                    $scope.idx++;
                    $scope.loadimg($scope.idx);
                });
            });
        }
    };
    $scope.close = function() {
        $modalInstance.dismiss();
    };
    $scope.loadimg($scope.idx);
})
.controller("BaseController", function($scope, $location) {
    $scope.navCollapsed = true;
    $scope.isActive = function(location) {
        return location === $location.path();
    };
    $scope.toTop = function() {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
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
        $rootScope.$state.go('products.list', {tab: item.group});
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
.controller("InquiryController", function($scope, $http, $location, $anchorScroll) {
    $scope.state = "success";
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
                $scope.alert.text = "We have received your inquiry and will contact you soon. Thank you for your interest.";
                $scope.alert.type = "alert-success";
                document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random();
                $scope.send = "Send";
                $location.hash("content");
                $anchorScroll();
            })
            .error(function(data, status) {
                if (status === 402) {
                    $scope.alert.text = "The Security code is wrong. Please enter the correct text.";
                    $scope.alert.type = "alert-danger";
                    $scope.wrong_captcha = true;
                    $location.hash("content");
                    $anchorScroll();
                } else {
                    $scope.alert.text = "There are some problems with our system. Please contact us by the company information.";
                    $scope.alert.type = "alert-danger";
                    $location.hash("content");
                    $anchorScroll();
                }
                $scope.send = "Send";
            });
        }
    };
    $scope.check_captcha = function() {
        $http({
            method: "POST",
            url: "index.php/securimage/securimage_ajax",
            data: {
                'input': $scope.inputs.captcha.content
            }
        })
        .success(function() {
            $scope.wrong_captcha = false;
        })
        .error(function() {
            $scope.wrong_captcha = true;
        });
    };
    $scope.reset();
});
