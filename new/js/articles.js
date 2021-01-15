article_controler = function($scope, $http, prihlasenie) {
    $scope.prava = prihlasenie;
    $scope.load = function() {
        $scope.rows = [];
        $http({
            method: 'POST',
            url: 'database/database_prispevky_load.php',
        }).then(function(result) {
            angular.forEach(result.data, function(item) {
                $scope.rows.push(
                    {
                        clanok: item.article,
                    }
                );
            });
        });
    }
    $scope.load();

    $scope.zmena = function() {
        //console.log($scope.obsahuje);
    }
}

app.controller("article_controler", article_controler)