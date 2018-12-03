class Options {

    constructor(page) {
      if (page == 'pageMenu') {
         this.options = [{value: '0', text: '--NA--' }]; 
      } else if (page == 'pageTemplate') {
         this.options = [];
      } else {
         this.options = [{value: '0', text: '--First--' }];
      }
      this.page = page;
    }    

    get() {      
      return this.options;      
    }

    clear(options) {
      options = []; 
      if(this.page == 'pageMenu') {      
         options = [{value: '0', text: '--NA--' }];  
      } else {
         options = [{value: '0', text: '--First--' }];
      }     

      this.options = options;
      return this.options;     
    }    

    setOptionValues(url) { 
      var app = this;       
      
      axios.get(url)
       .then(function(resp) {                
          if (app.page == 'pageMenu' || app.page == 'pageMenuAfter') {
             var result = resp.data.pagemenu;
          } else {
             var result = resp.data.page_templates;
          } 
            
          for(var i=0; i < result.length; i++) { 
            if (app.page == 'pageTemplate') {
              var value  = result[i].title;                
            } else {
              var value  = result[i].id;                
            }

            app.options.push( 
            {
              value: value,
              text: result[i].title
            });           
          } 
      })
      .catch(function(resp) {
        console.log(resp.data);                
      });            
   } 
}

export default Options;