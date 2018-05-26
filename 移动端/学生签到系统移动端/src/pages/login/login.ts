import { Component } from '@angular/core';
import {AlertController, IonicPage, NavController, NavParams, ToastController} from 'ionic-angular';
import {StudentHomePage} from "../student-home/student-home";
import {TeacherHomePage} from "../teacher-home/teacher-home";

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
export class LoginPage {
  public role;
  constructor(public navCtrl: NavController, public navParams: NavParams,private toastCtrl:ToastController,
              private alertCtrl:AlertController) {
  }
  login()
  {
    if(this.role == 0)
    {
      this.navCtrl.push(StudentHomePage);
    }
    else
    {
      this.navCtrl.push(TeacherHomePage);
    }
  }

}
