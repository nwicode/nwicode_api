import { Injectable } from '@angular/core';
import {RequestWrapperService} from './request-wrapper.service';

@Injectable({
    providedIn: 'root'
})
export class UserService {

    constructor(private request: RequestWrapperService) { }

    /**
     * Get current user data.
     */
    async getCurrentUser() {
        let result: any;

        try {
            const response =  await this.request.post('currentUser', {}).toPromise();
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
     * Get user login.
     */
    async getUserLogin() {
        let result: any;

        try {
            const response =  await this.request.post('getUserLogin', {}).toPromise();
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
     * Get user name.
     */
    async getUserName() {
        let result: any;

        try {
            const response =  await this.request.post('getUserName', {}).toPromise();
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
     * Check user authorize.
     */
    async isLogin() {
        let result: any;

        try {
            const response =  await this.request.post('isUserLogin', {}).toPromise();
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
     * Check user not authorize.
     */
    async isNotLogin() {
        let result: any;

        try {
            const response =  await this.request.post('isUserLogin', {}).toPromise();
            const data = response.data;
            data.is_error = false;
            data.isLogin = !data.isLogin;
            result = data;
        } catch (error) {
            error.is_error = true;
            result = error;
        }

        return result;
    }
}
