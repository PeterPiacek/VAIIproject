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
                        id: item.id,
                        author: item.author,
                        title: item.title,
                        segment: item.article
                    }
                );
                console.log()
            });
        });
    }
    $scope.load();

    $scope.save = {
        title: "",
        segment: ""
    };

    $scope.pridaj = function() {
        if ($scope.save.title && $scope.save.segment) {
            $scope.idUprava = -1;
            $scope.pridavok = $.param({
                title: $scope.save.title,
                segment: $scope.save.segment,
                author: $scope.prava.name
            });
            $http({
                method: 'POST',
                url: 'database/database_prispevky_add.php',
                data: $scope.pridavok,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(){
                $scope.load();
            });
        }
    }

    $scope.zmaz = function(id){
        $scope.idUprava = -1;
        $scope.zmazanie = $.param({
            id: id
        })
        $http({
            method: 'POST',
            url: 'database/database_prispevky_delete.php',
            data: $scope.zmazanie,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(){
            $scope.load();
        });
    }

    $scope.idUprava = -1;
    $scope.update = {
        title: "",
        segment: ""
    }

    $scope.zacniUpravu = function(article) {
        if($scope.idUprava == -1){
            $scope.idUprava = article.id;
            $scope.update.title = article.title;
            $scope.update.segment = article.segment;
        }
    }

    $scope.ukonciUpravu = function(id) {
        $scope.idUprava = -1;
        if ($scope.update.title && $scope.update.segment) {
            $scope.uprava = $.param({
                id: id,
                title: $scope.update.title,
                segment: $scope.update.segment,
            });
            $http({
                method: 'POST',
                url: 'database/database_prispevky_update.php',
                data: $scope.uprava,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(){
                $scope.load();
            });
        }
    }

    $scope.zmena = function() {
    }
}

app.controller("article_controler", article_controler)