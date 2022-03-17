      //angular content service
      app.service('ContentService', function($http, $q) {

     
        this.loadList = function (list_id, sort_field="", sort_direction="ASC", limit = "0") {
            var data = {list_id:list_id, sort_field:sort_field, sort_direction:sort_direction, limit:limit, sb:"ujpqrudd641jmnqqdmli"};
            return $http.post("/mobile/loadList",JSON.stringify(data));

        }	  
      
        this.setCurrentContent = function(content_id,item) {
          console.log("Store content to storag: "+content_id);
          console.log(item);
          localStorage.setItem("app_"+"ujpqrudd641jmnqqdmli"+"_current_content_"+content_id,JSON.stringify(item));
        }	  
      
        this.getCurrentContent = function (content_id) {

          if (this[content_id]!==undefined) {
            console.log("get stored content "+content_id+" from this variable");
            //console.log(this[content_id]);
            return this[content_id];
          } else {

            console.log("get stored content "+content_id+" from localstorage");
            let result = localStorage.getItem("app_"+"ujpqrudd641jmnqqdmli"+"_current_content_"+content_id);
            //console.log(result);
            //console.log("app_"+"ujpqrudd641jmnqqdmli"+"_current_content_"+content_id);
            if (result!==null) {
            this[content_id] = JSON.parse(result);
              return JSON.parse(result); 
            } else return null; 
          }
        }
	    });