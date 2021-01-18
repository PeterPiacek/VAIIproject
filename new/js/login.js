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
            if (result.data) {
                sessionStorage.prihlaseny = true;
                sessionStorage.meno = angular.toJson(result.data.name);
                window.location = "index.php?page=prispevky";
                if (result.data.admin) {
                    sessionStorage.admin = angular.toJson(result.data.admin);
                }
            }
        });
    }
}

prihlasenie = function() {
    return {
        prihlaseny: angular.fromJson(sessionStorage.prihlaseny) != null,
        admin: angular.fromJson(sessionStorage.admin) == null ? false : angular.fromJson(sessionStorage.admin) == 1 ? true : false,
        name: angular.fromJson(sessionStorage.meno)
    };
}

app.factory("prihlasenie", prihlasenie);
app.controller("login_controler", login_controler);