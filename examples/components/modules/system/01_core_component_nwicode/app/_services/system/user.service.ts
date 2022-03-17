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

    /**
     * Set user topic.
     */
    async setTopic(topic_id, state) {
        let result: any;

        try {
            const response =  await this.request.post('setTopic', {
                topic_id: topic_id,
                state: state
            }).toPromise();
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
     * Get user topics.
     */
    async getTopics() {
        let result: any;

        try {
            const response =  await this.request.post('getTopics', {}).toPromise();
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
     * Get user topics.
     */
    async getTopic(topic_id) {
        let result: any;

        try {
            const response =  await this.request.post('getTopic', {
                topic_id: topic_id
            }).toPromise();
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
     * Save collection record.
     *
     * @param collectionId collection id
     * @param values record values
     */
    async saveCollectionRecord(collectionId, values) {
        let result: any;

        try {
            const response =  await this.request.post('saveCollectionRecord', {
                collectionId: collectionId,
                values: values
            }).toPromise();
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
     * Get data for rss component.
     *
     * @param component_id component id
     */
    async getRssFeed(component_id) {
        let result: any;

        try {
            const response =  await this.request.post('getRssFeed', {
                component_id: component_id,
            }).toPromise();
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
