import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {StudentCheckInOutPage} from "../student-check-in-out/student-check-in-out";
import { UserPage } from '../user/user';
import { CourseTablePage } from '../course-table/course-table';

/**
 * Generated class for the StudentHomePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-student-home',
  templateUrl: 'student-home.html',
})
export class StudentHomePage {

  tab1Root = StudentCheckInOutPage;
  tab2Root = CourseTablePage;
  tab3Root = UserPage;

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad StudentHomePage');
  }

}
