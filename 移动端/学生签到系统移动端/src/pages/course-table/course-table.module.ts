import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { CourseTablePage } from './course-table';

@NgModule({
  declarations: [
    CourseTablePage,
  ],
  imports: [
    IonicPageModule.forChild(CourseTablePage),
  ],
})
export class CourseTablePageModule {}
