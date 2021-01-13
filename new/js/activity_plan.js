var app = angular.module("activity_plan", ["ngRoute"]);

plan_controler = function($scope, $http) {
    $scope.cards = [];
    $scope.load = function() {
        $http({
            method: 'POST',
            url: 'database/database_plan_load.php',
        }).then(function(result) {
            angular.forEach(result.data, function(item) {
                $scope.cards.push(
                    {
                        datum: item.date,
                        akcia: item.activity,
                        popis: item.description
                    }
                );
            });
        });
    };
    $scope.load();
}

app.controller("plan_controler", plan_controler)