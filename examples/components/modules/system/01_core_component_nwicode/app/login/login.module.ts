import { NgModule } from '@angular/core';
import { Component, OnInit, NgZone  } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { CommonComponent} from '../CommonComponent';
import {LoginRoutingModule} from './login-routing.module';
import {LoginComponent} from './login.component';

@NgModule({
  providers: [],
  imports: [CommonModule,FormsModule, ReactiveFormsModule, IonicModule, LoginRoutingModule],
  declarations: [LoginComponent],
})
export class LoginModule {}
