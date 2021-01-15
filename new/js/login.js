var app = angular.module("mojaApp", []);

login_controler = function($scope, $http, prihlasenie) {
    $scope.prava = prihlasenie;
    $scope.kontrolaPrihlasenia = function(){
        $scope.udaje = $.param({
            name: $scope.name,
            password: $scope.password
        });
        $http({
            method: 'POST',
            url: 'database/database_login_check.php',
            data: $scope.udaje,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result) {
            //$scope.name = result.name;
            //$scope.admin = result.admin;
            if (result.data) {
                sessionStorage.prihlaseny = true;
                if (result.data.admin) {
                    //console.time(ukladam);
                    sessionStorage.admin = angular.toJson(result.data.admin);
                }
            }
        });
    }
    console.log(sessionStorage.admin);
}

prihlasenie = function() {
    console.log(angular.fromJson(sessionStorage.prihlaseny));
    return {
        prihlaseny: angular.fromJson(sessionStorage.prihlaseny) != null,
        admin: angular.fromJson(sessionStorage.admin) == null ? false : angular.fromJson(sessionStorage.admin) == 1 ? true : false
    };
}

app.factory("prihlasenie", prihlasenie);
app.controller("login_controler", login_controler);