import React, { Component } from 'react';

export class Search extends Component {

    constructor(props) {
        super(props);

        this.state = {
            search : ''
        }

        this.handleUserInput = this.handleUserInput.bind(this);

    }

    handleUserInput(e) {
        const name = e.target.name;
        const value = e.target.value;
        this.setState({
            [name]: value
        });

        this.props.search(e);
    }



    render() {
        return (
            <div className="col-lg-6 text-right">
                <input type="text" name="search" onChange={this.handleUserInput} value={this.state.search} placeholder="Search by title" />
            </div>
        );
    }

}
