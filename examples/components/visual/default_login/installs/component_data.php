<?php

$component_data['*.component.ts'] = [
    "import" => ["import { Component, OnInit } from '@angular/core';", "import {AuthService} from '../_services/system/auth.service';", "import {FormControl, FormGroup} from '@angular/forms';"],
    "variables" => "formGroup: FormGroup;",
    "constructor_objects" => "private auth: AuthService",
    "constructor" => "",
    "ngOnInit" => "this.initFormGroup();",
    "ngOnDestroy" => "",
    "ionViewWillEnter" => "",
    "ionViewDidEnter" => "",
    "ionViewWillLeave" => "",
    "ionViewDidLeave" => "",
    "body" => "login() {
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
  }",
];
