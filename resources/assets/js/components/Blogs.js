import React, { Component } from 'react';

import { Search } from './Search';
import { Order }  from './Order';

var striptags = require('striptags');

export default class Blogs extends Component {

    constructor(props) {
        super(props);

        this.state = {
            blogs: [],
            token: document.head.querySelector('meta[name="csrf-token"]').content,
        }

        this.searchByTitle = this.searchByTitle.bind(this);
        this.orderByDate = this.orderByDate.bind(this);
    }

    componentDidMount() {

        fetch('/blogs/all', {
            method: 'GET'
        })
            .then(response => {
                return response.json();
            })
            .then(data => {

                this.setState({
                    blogs: data.blogs
                });

            });

    }


    searchByTitle(e) {

        fetch('/blogs/search', {
            method: "POST",
            body: JSON.stringify({
                _token: this.state.token,
                search: e.target.value
            }),
            headers: {
                'X-CSRF-TOKEN': this.state.token
            },
        })
            .then(response => {
                return response.json();
            })
            .then(data => {

                this.setState({
                    blogs: data.blogs
                });

            });


    }

    orderByDate(e) {

        fetch('/blogs/order', {
            method: "POST",
            body: JSON.stringify({
                _token: this.state.token,
                order: e.target.value
            }),
            headers: {
                'X-CSRF-TOKEN': this.state.token
            },
        })
            .then(response => {
                return response.json();
            })
            .then(data => {

                this.setState({
                    blogs: data.blogs
                });

            });

    }


    render() {

        function imageExists(image_url) {

            var http = new XMLHttpRequest();

            http.open('HEAD', image_url, false);
            http.send();

            return http.status != 404;

        }

        return (
            <div className="row">
                <div className="col-lg-12">
                    <div className="row">
                        <Order onChange={this.orderByDate} />
                        <Search search={this.searchByTitle}/>
                    </div>
                </div>
                <div className="row">

                    {!this.state.blogs && (
                        <div className="col-lg-12">No blogs added yet</div>
                    )}

                    {this.state.blogs && this.state.blogs.map((blog, i) => {

                        let imageUrl = imageExists("storage/blogs/" + blog._id + ".jpg")
                            ? "storage/blogs/" + blog._id + ".jpg"
                            : "https://dummyimage.com/200x200/c2c2c2/b0b0b0";

                        let descr = striptags(blog.description);

                        return (
                            <div className="col-lg-4" key={i}>
                                <div className="blog-container">
                                    <div className="blog-container--img"
                                         style={{ backgroundImage : `url(${imageUrl})` }}></div>
                                    <div className="blog-container--content">
                                        <p className="blog-container--content-title">{ blog.title }</p>
                                        <div
                                            className="blog-container--content-descr">{ descr.substring(0, 70) }...
                                        </div>
                                        <a href={ "/blog/" + blog.slug } className="read-more">Read more</a>
                                    </div>
                                </div>
                            </div>);
                    })}

                </div>
            </div>
        );
    }
}
