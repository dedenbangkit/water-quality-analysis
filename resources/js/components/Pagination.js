import React, { Component } from 'react';
import { connect } from 'react-redux'
import { mapStateToProps, mapDispatchToProps } from '../reducers/actions.js'
import Submit from './Submit.js';

class Pagination extends Component {
    constructor(props) {
        super(props);
        this.next = this.next.bind(this);
        this.nextalert = this.nextalert.bind(this);
        this.prev = this.prev.bind(this);
    }

    next() {
        this.props.updateGroup()
        console.log(this.props.value.group)
        const change = this.props.value.page === this.props.value.sections.length ? false : true
        if (change) {
            this.props.changeGroup(this.props.value.page + 1);
            window.scrollTo(0, 0)
        }
        return change;
    }

    nextalert() {
        console.log("alert");
    }

    prev() {
        const change = this.props.value.page === 1 ? false : true
        if (change) {
            this.props.changeGroup(this.props.value.page - 1);
            window.scrollTo(0, 0)
        }
        return change;
    }

    render() {
        return (
            <div className="container-fluid container-pagination">
                <div className="row justify-content-center">
                    <div className="col-md-8 text-right">
                    <div className="btn-group">
                        <button
                            type="button"
                            className={this.props.value.page === 1 ? "btn btn-secondary" : "btn btn-info"}
                            onClick={this.prev}
                        ><strong>Prev</strong></button>
                        <button
                            type="button"
                            className={
                                (this.props.value.sections.length === this.props.value.group.page ? "btn btn-secondary" :
                                    (this.props.value.group.complete ?  "btn btn-info" : "btn btn-secondary")
                                )
                            }
                            onClick={this.props.value.group.complete ? this.next : this.nextalert}
                        ><strong>Next</strong></button>
                    </div>
                    <Submit show={this.props.value.page < this.props.value.sections.length ? "hidden" : ""} />
                    </div>
                </div>
            </div>
        );
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Pagination);
