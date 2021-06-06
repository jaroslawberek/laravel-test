/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class WebApp {
    constructor() {   
               
    }

    turnOn() {
        return this.url['host'];
     }
     
     get host(){
         return window.location.host;
     }
     get href(){
         return window.location.href;
     }
     get hostname(){
                 return window.location.hostname;
     }
     get queryString(){
                 return window.location.search;
     }
     get pathname(){
                 return window.location.pathname;
     }
     get origin(){
          return window.location.origin;
     }
     get urlParams(){
         return new URLSearchParams(window.location.search);
     }
}


var app = new WebApp();

