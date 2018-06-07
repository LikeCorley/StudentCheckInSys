import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { CheckInStatePage } from './check-in-state';

@NgModule({
  declarations: [
    CheckInStatePage,
  ],
  imports: [
    IonicPageModule.forChild(CheckInStatePage),
  ],
})
export class CheckInStatePageModule {}
