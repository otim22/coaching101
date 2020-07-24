const guid = () => {
    function s4() {
        return Math.floor((1 + Math.random()) * 0x10000)
        .toString(16)
        .substring(1);
    }
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
};

class Request {
    constructor() {
        this.baseURL = null;
        this.data = null;
        this.courses = [];
        this.headers = {};
        this.method = null;
    }
    set(header, value) {
        this.headers[header] = value;
        return this;
    }
    get(baseURL) {
        this.baseURL = baseURL;
        this.method = 'GET';
        return this;
    }
    post(baseURL) {
        this.baseURL = baseURL;
        this.method = 'POST';
        return this;
    }
    put(baseURL) {
        this.baseURL = baseURL;
        this.method = 'PUT';
        return this;
    }
    end(callback) {
        let res;
        if (this.method === 'POST') {
            if (this.baseURL.endsWith('/courses')) {
                res = {body: Object.assign({}, this.data, {id: guid()}), status: 200};
                this.users.push(res.body);
            }
        } else if (this.method === 'PUT') {
            if (this.baseURL.includes('/courses/')) {
                res = {body: this.data, status: 200};
            }
        } else if (this.method === 'GET') {
            if (this.baseURL.endsWith('/courses')) {
                res = {body: this.products};
            }
        }
        callback(res);
        return this;
    }
    catch(e) {
        /* Ignore */
    }
    send(data) {
        this.data = data;
        return this;
    }
}

module.exports.Request = Request;
