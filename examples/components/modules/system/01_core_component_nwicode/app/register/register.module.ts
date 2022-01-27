import { NgModule } from '@angular/core';
import { Component, OnInit, NgZone  } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { CommonComponent} from '../CommonComponent';
import {RegisterRoutingModule} from './register-routing.module';
import {RegisterComponent} from './register.component';

@NgModule({
  providers: [],
  imports: [CommonModule,FormsModule, ReactiveFormsModule, IonicModule, RegisterRoutingModule],
  declarations: [RegisterComponent],
})
export class RegisterModule {}
