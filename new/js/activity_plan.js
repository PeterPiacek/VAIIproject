var app = angular.module("activity_plan", ["ngRoute"]);

plan_controler = function($scope, $http) {
    $scope.load = function() {
        $scope.rows = [];
        $http({
            method: 'POST',
            url: 'database/database_plan_load.php',
        }).then(function(result) {
            angular.forEach(result.data, function(item) {
                $scope.rows.push(
                    {
                        id: item.id,
                        datum: item.date,
                        akcia: item.activity,
                        popis: item.description
                    }
                );
            });
        });
    }
    $scope.load();

    $scope.pridaj = function() {
        var date = new Date($scope.date);
        var dateStr = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
        $scope.pridavok = $.param({
            date: dateStr,
            activity: $scope.activity,
            description: $scope.description,
        });
        console.log($scope.pridavok);
        $http({
            method: 'POST',
            url: 'database/database_plan_add.php',
            data: $scope.pridavok,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
            $scope.load();
            console.log(result);
        });
    }

    $scope.zmaz = function(id){
        $scope.zmazanie = $.param({
            id: id
        })
        $http({
            method: 'POST',
            url: 'database/database_plan_delete.php',
            data: $scope.zmazanie,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(){
            $scope.load();
        });
    }

    $scope.uprav = function(id) {
        var date = new Date($scope.date);
        var dateStr = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
        $scope.uprava = $.param({
            id: id,
            date: dateStr,
            activity: $scope.activity,
            description: $scope.description,
        });
        $http({
            method: 'POST',
            url: 'database/database_plan_update.php',
            data: $scope.uprava,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
            $scope.load();
        });
    }

    $scope.zmena = function() {
        //console.log($scope.obsahuje);
    }
}

app.controller("plan_controler", plan_controler)