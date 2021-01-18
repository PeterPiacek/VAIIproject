profiles_controler = function($scope, $http, prihlasenie) {
    $scope.prava = prihlasenie;

    $scope.save = {
        name: "",
        password: "",
        email: "",
        admin: false
    };

    $scope.load = function() {
        $scope.rows = [];
        $http({
            method: 'POST',
            url: 'database/database_profiles_load.php',
        }).then(function(result) {
            console.log(result);
            angular.forEach(result.data, function(item) {
                $scope.rows.push(
                    {
                        meno: item.name,
                        mail: item.email
                    }
                );
            });
        });
    }
    $scope.load();

    $scope.pridaj = function() {
        if ($scope.save.name && $scope.save.password) {
            $scope.pridavok = $.param({
                name: $scope.save.name,
                password: $scope.save.password,
                email: $scope.save.email
            });
            console.log($scope.pridavok)
            $http({
                method: 'POST',
                url: 'database/database_profiles_add.php',
                data: $scope.pridavok,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(){
                $scope.load();
            });
        }
    }

    $scope.zmena = function() {
        //console.log($scope.obsahuje);
    }
}

app.controller("profiles_controler", profiles_controler)