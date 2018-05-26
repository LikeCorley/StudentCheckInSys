import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

import {LoginPage} from "../pages/login/login";
import {StudentHomePage} from "../pages/student-home/student-home";
import {TeacherHomePage} from "../pages/teacher-home/teacher-home";
import {StudentCheckInOutPage} from "../pages/student-check-in-out/student-check-in-out";

@NgModule({
  declarations: [
    MyApp,
    LoginPage,
    StudentHomePage,
    TeacherHomePage,
    StudentCheckInOutPage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    LoginPage,
    StudentHomePage,
    TeacherHomePage,
    StudentCheckInOutPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
