window.Vue = require('vue');
//import moment js
import moment from 'moment';

//make custom filter
Vue.filter('timeformat',(arg)=>{
    return moment(arg).format("MMM Do YY , h:mm:ss a");
});

Vue.filter('sortlength',function (text,length,suffix) {
    return text.substring(0,length)+suffix;
});

