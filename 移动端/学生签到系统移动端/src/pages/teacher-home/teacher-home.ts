import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {StudentCheckInOutPage} from "../student-check-in-out/student-check-in-out";
import { CourseTablePage } from '../course-table/course-table';
import { CheckInStatePage } from '../check-in-state/check-in-state';

/**
 * Generated class for the TeacherHomePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-teacher-home',
  templateUrl: 'teacher-home.html',
})
export class TeacherHomePage {

  tab1Root = CheckInStatePage;
  tab2Root = CourseTablePage;
  tab3Root = StudentCheckInOutPage;
  tab4Root = StudentCheckInOutPage;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad TeacherHomePage');
  }

}
