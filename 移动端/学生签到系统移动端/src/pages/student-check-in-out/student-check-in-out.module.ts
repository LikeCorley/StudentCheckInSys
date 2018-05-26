import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { StudentCheckInOutPage } from './student-check-in-out';

@NgModule({
  declarations: [
    StudentCheckInOutPage,
  ],
  imports: [
    IonicPageModule.forChild(StudentCheckInOutPage),
  ],
})
export class StudentCheckInOutPageModule {}
