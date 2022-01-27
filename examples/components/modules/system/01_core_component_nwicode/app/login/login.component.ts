import { Component, OnInit } from '@angular/core';
import {AuthService} from '../_services/system/auth.service';
import {FormControl, FormGroup} from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {

  formGroup: FormGroup;

  constructor(private auth: AuthService) { }

  ngOnInit() {
    this.initFormGroup();
  }

  login() {
    this.auth.login(this.formGroup.value.email, this.formGroup.value.password).then(response => {
      console.log(response);
      }
    );
  }

  initFormGroup() {
    this.formGroup = new FormGroup({
      email: new FormControl(''),
      password: new FormControl('')
    });
  }
}
