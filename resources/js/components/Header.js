import React, { Component } from 'react';

class Header extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
        <div className="main-header bg-white border-bottom content-header">
            <h2 className="font-weight-bold text-center page-title">
                Data visualisation of drinking water <i className="fas fa-tint" /> quality analysis
            </h2>
        </div>
        );
    }
}

export default Header;
