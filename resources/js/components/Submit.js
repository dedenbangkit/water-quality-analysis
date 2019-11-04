import React, { Component } from 'react';
import { connect } from 'react-redux'
import { mapStateToProps, mapDispatchToProps } from '../reducers/actions.js'

class Submit extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        let cname = this.props.value.submit ? "btn btn-submit" : "btn btn-secondary"
        return (
            <div className={"btn-group btn-ready " + this.props.show}>
                <button
                    type="button"
                    className={cname}
                >
                    <strong>Submit</strong>
                </button>
            </div>
        );
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Submit);
