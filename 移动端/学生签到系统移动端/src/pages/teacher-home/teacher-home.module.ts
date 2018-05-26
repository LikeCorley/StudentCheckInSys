import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { TeacherHomePage } from './teacher-home';

@NgModule({
  declarations: [
    TeacherHomePage,
  ],
  imports: [
    IonicPageModule.forChild(TeacherHomePage),
  ],
})
export class TeacherHomePageModule {}
