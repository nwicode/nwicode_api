import { Component, OnInit } from '@angular/core';
import {FormControl, FormGroup} from '@angular/forms';
import {AuthService} from '../_services/system/auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss'],
})
export class RegisterComponent implements OnInit {

  formGroup: FormGroup;

  constructor(private auth: AuthService) { }

  ngOnInit() {
    this.initFormGroup();
  }

  initFormGroup() {
    this.formGroup = new FormGroup({
      name: new FormControl(''),
      email: new FormControl(''),
      password: new FormControl('')
    });
  }

  register() {

    this.auth.register(this.formGroup.value.name, this.formGroup.value.email, this.formGroup.value.password).then(response => {
        console.log(response);
      }
    );
  }
}
