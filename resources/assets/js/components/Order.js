import React, { Component } from 'react';

export class Order extends Component {

    constructor(props) {
        super(props);

        this.state = {}
    }

    render() {
        return (
            <div className="col-lg-6">
                <label>Filter by date:</label>
                <select style={{ marginLeft: "15px" }} onChange={this.props.onChange}>
                    <option value="desc" >Newest first</option>
                    <option value="asc" >Old first</option>
                </select>
            </div>
        );
    }

}
