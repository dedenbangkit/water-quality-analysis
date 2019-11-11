import React, { Component } from 'react';
import { connect } from 'react-redux'
import { mapStateToProps } from '../reducers/actions.js'

class ProgressBar extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        let getGroup = () => {
            let section = this.props.value.sections;
            let list = section.map(x => {
                return (
                    <li
                        key={'progress' + x.page}
                        className={(this.props.value.page >= (x.page + 1) ? "active": "")}
                    >
                    </li>
                );
            });
            return list;
        };
        return (
            <section className="section">
            <div className="container-fluid">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-body card-progress">
                            <div className="container-progress">
                            <ul className="progressbar">
                                {getGroup()}
                            </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        );
    }
}

export default connect(mapStateToProps)(ProgressBar);
