import React, { Component } from 'react';
import { connect } from 'react-redux'
import { mapStateToProps, mapDispatchToProps } from '../reducers/actions.js'
import Axios from 'axios';
import Swal from 'sweetalert2'

class Submit extends Component {
    constructor(props) {
        super(props);
        this.showAlert = this.showAlert.bind(this);
		this.state = {};
    }

    submit(isReady) {
		if(isReady) {
			axios.post("/api/submit", {data: this.props.value.questions, user: this.state})
			.then( res => { return res; })
			.then( res => { return res; })
			.then( res => { return this.alertOutro(); })
			.then( res => { window.location.replace("/end"); });
		}
    }

    showAlert() {
        console.log('alert');
    }

    render() {
        let isReady = (this.props.value.questions.length === this.props.value.questions.filter(x => {
            return x.answer;
        }).length)
        let cname = isReady ? "btn btn-info" : "btn btn-secondary"
        return (
            <div className={"btn-group btn-ready " + this.props.show}>
                <button
                    type="button"
                    className={cname}
                    onClick={this.submit.bind(this)}
                >
                    <strong>Submit</strong>
                </button>
            </div>
        );
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Submit);
