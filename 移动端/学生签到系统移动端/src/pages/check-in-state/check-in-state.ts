import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the CheckInStatePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-check-in-state',
  templateUrl: 'check-in-state.html',
})
export class CheckInStatePage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad CheckInStatePage');
  }

  doInfinite(infiniteScroll){
    console.log(infiniteScroll);
   // 请求数据
    //infiniteScroll.complete();
  }

  doRefresh(refresher){
      setTimeout(() => {
      refresher.complete(); //当数据请求完成调用
      }, 2000);
      //refresher.complete(); //当数据请求完成调用
  }

}
