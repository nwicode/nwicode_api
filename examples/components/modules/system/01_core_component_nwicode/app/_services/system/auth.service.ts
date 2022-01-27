import { Injectable } from '@angular/core';
import { RequestWrapperService } from './request-wrapper.service';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  isLoggedIn = false;
  token: any;

  constructor(private request: RequestWrapperService) { }

  /**
   * Authorize user by login and password.
   *
   * @param mail user email
   * @param password user password
   */
  async login(mail: string, password: string) {
    let result: any;

    try {
      const response =  await this.request.post('login', { mail: mail, password: password }).toPromise();
      const data = response.data;
      data.is_error = false;
      result = data;

      //store token
      localStorage.setItem('token', data.access_token);

    } catch (error) {
      error.is_error = true;
      result = error;
    }

    return result;
  }

  /**
   * Create new user.
   *
   * @param name user name
   * @param mail user email
   * @param password user password
   */
  async register(name: string, mail: string, password: string) {
    let result: any;

    try {
      const response =  await this.request.post('register', {name: name, mail: mail, password: password}).toPromise();
      const data = response.data;

      data.is_error = false;
      result = data;

    } catch (error) {
      error.is_error = true;
      result = error;
    }

    return result;
  }

  /**
   * Logout user.
   */
  async logout() {
    let result: any;

    try {
      const response =  await this.request.post('logout', {}).toPromise();
      const data = response.data;
      console.log(data);
      data.is_error = false;
      result = data;

      localStorage.removeItem('token');
    } catch (error) {
      error.is_error = true;
      result = error;
    }

    return result;
  }

  /**
   * Reset password.
   *
   * @param mail user email
   */
  async resetPassword(mail: string) {
    let result: any;

    try {
      const response =  await this.request.post('reset_password', { mail: mail }).toPromise();
      const data = response.data;
      data.is_error = false;
      result = data;
    } catch (error) {
      error.is_error = true;
      result = error;
    }

    return result;
  }
}
