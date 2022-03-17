//angular click service
app.service('NavigateService', function() {

    this.topageforward = function (page) {
        console.log('topageforward '+page);
        window.location.href = page + ".php";
    }
    this.topageback = function (page) {
        console.log('topageback '+page);
        window.location.href = page + ".php";
    }
    this.topage = function (page) {
        console.log('topage '+page);
        window.location.href = page + ".php";
    }
});