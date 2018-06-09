import { Component } from '@angular/core';
import {AlertController, IonicPage, NavController, NavParams, ToastController} from 'ionic-angular';
import {StudentHomePage} from "../student-home/student-home";
import {TeacherHomePage} from "../teacher-home/teacher-home";
import {Http,Jsonp,Headers} from "@angular/http";
import {Observable} from "rxjs";
import "rxjs/Rx";

/**
 * Generated class for the LoginPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage 
{
  private headers = new Headers({'Content-Type': 'application/json'});

  public username;
  public password;

  
  public role;
  constructor(public navCtrl: NavController, public navParams: NavParams,private toastCtrl:ToastController,
              private alertCtrl:AlertController,private http:Http,private jsonp:Jsonp) {
  }
  login()
  {
    console.log(this.username);
    console.log(this.password);

    let url = "http://www.corley.cn/api/v1/student/"+this.username+"?password="+this.password;
    let that = this;
    // let params = new URLSearchParams(); 
    // params.set("callback", "__ng_jsonp__.__req0.finished")    
    
    // this.http.get(url).subscribe(
    //               function(data)
    //               {
    //                 console.log(JSON.parse(data['_body']));
    //                 that.navCtrl.push(StudentHomePage);
    //               },
    //               function(err)
    //               {
    //                 console.log('失败');
    //               });

    if(this.role == 0)
    {
      this.navCtrl.push(StudentHomePage);
    }
    else
    {
      this.navCtrl.push(TeacherHomePage);
    }
    
    // this.http.post('http://www.corley.cn/api/v1/student/170327096',JSON.stringify({password: '123456'}), {headers:this.headers}).subscribe(
    //                 function(res){
    //                 console.log(res.json()); 
    //                 });
 
    // this.jsonp.get("http://www.corley.cn/api/v1/student/170327096?password=123456&callback=JSONP_CALLBACK") 
    //  .subscribe( 
    //  function(data)
    //  {
    //   console.log(data)
    //  });

    

    
  }

}
