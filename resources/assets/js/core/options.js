class Options {

    constructor() {
        this.options = [{value: '0', text: '--NA--' }];        
    }

    setOptionItems(resp) {          
        if (resp.length > 0) {
            for(var i = 0; i < resp.length; i++) { 
              this.options.push( 
              {
                 value: resp[i].id,
                 text: resp[i].title
              });
            }        
        }    
    } 

    get() {      
       return this.options;      
    }

    clear(options) {
      options = []; 
      options = [{value: '0', text: '--NA--' }];  
      this.options = options;
      return this.options;     
    }
    
}

export default Options;