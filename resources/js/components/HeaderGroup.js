import React, { Component } from 'react';
import { connect } from 'react-redux';
import { mapStateToProps, mapDispatchToProps } from '../reducers/actions.js';
import Tableau from './Tableau.js';

class HeaderGroup extends Component {
    constructor(props) {
        super(props);
        this.getVisual = this.getVisual.bind(this);
        this.getLoading = this.getLoading.bind(this);
        this.showLoading = this.showLoading.bind(this);
		this.state = {
			_isLoading:true
		}
    }

	getLoading(tf) {
		this.setState({_isLoading: tf})
	}

    getVisual(visual) {
        return (
            <Tableau url={visual} getLoading={this.getLoading}/>
        )
    }

	showLoading() {
		return(
			<div className="card-tools">
				<div className="btn btn-tool text-bold">
					<i className={"fas fa-spin fa-spinner"}/> Loading Visualisation ...
				</div>
			</div>
		);
	}

    render() {
        return (
            <div className="container-fluid" key={"page-" + this.props.data.id}>
                <div className="row justify-content-center">
                    <div className="col-md-8 col-sm-12">
                        <div className="card card-info">
                            <div className="card-header text-bold">
								<h3 className="card-title">
                                	<i className={"fas fa-" + this.props.data.icon}/> {this.props.data.text}
                            	</h3>
								{this.state._isLoading ? this.showLoading() : ""}
                            </div>
                            {this.props.data.visual === null ? "" : this.getVisual(this.props.data.visual)}
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(HeaderGroup);
