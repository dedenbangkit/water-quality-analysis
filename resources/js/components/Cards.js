import React, { Component, Fragment } from 'react';
import { connect } from 'react-redux'
import { mapStateToProps, mapDispatchToProps } from '../reducers/actions.js'
import Slider, { createSliderWithTooltip } from 'rc-slider';
import 'rc-slider/assets/index.css';

class Cards extends Component {

    constructor(props) {
        super(props);
        this.getAnswerType = this.getAnswerType.bind(this);
        this.showIntro = this.showIntro.bind(this);
        this.getOption = this.getOption.bind(this);
        this.getInput = this.getInput.bind(this);
        this.getSlider = this.getSlider.bind(this);
        this.handleAnswer = this.handleAnswer.bind(this);
        this.state = {
            selectedOption: "",
            value: ""
        }
    }

    handleAnswer (event) {
        const target = event.target;
        const value = target.type === 'radio' ? target.value : target.value;
        const name = target.name;

        this.setState({
          [name]: value
        });
        localStorage.setItem(name, value);
        this.props.reduceAnswer({
            id: parseInt(target.name.replace("answer-","")),
            answer: target.value
        });
        console.log(this.props.value.questions);
    }

    getInput(id) {
        return (
            <input
                key={"answer-" + id}
                type="text"
                className="form-control"
                name={"answer-" + id}
                value={this.value}
                onChange={this.handleAnswer}
            />
        )
    }

    getTextarea(id) {
        return (
            <textarea
                key={"answer-" + id}
                className="form-control"
                name={"answer-" + id}
                value={this.value}
                onChange={this.handleAnswer}
            />
        )
    }

    getSlider(answer) {
        let guide = answer.question.split(" ");
        return (
            <Fragment>
                <div className="row">
                    <div className="col-sm-4 text-left text-bold">
                        {guide[0]}
                    </div>
                    <div className="col-sm-4 text-center text-bold">
                        Neutral
                    </div>
                    <div className="col-sm-4 text-right text-bold">
                        {guide[1]}
                    </div>
                </div>
            <Slider
                defaultValue={50}
                trackStyle={{ backgroundColor: '#17a2b8', height: 10 }}
                reverse
                dots
                dotStyle={{
                  borderColor: '#c3c3c3',
                  height: 10,
                  width: 10,
                  marginLeft: -14,
                  bottom: -6,
                  backgroundColor: '#fefefe',
                }}
                step={10}
                handleStyle={{
                  borderColor: '#c3c3c3',
                  height: 24,
                  width: 24,
                  marginLeft: -14,
                  marginTop: -8,
                  backgroundColor: '#fefefe',
                }}
                railStyle={{ backgroundColor: '#6c757d', height: 10 }}
            />
            </Fragment>
        )
    }

    getOption(options, id) {
        return options.map(x => {
            return (
                <div className="form-check" key={"answer-" + x.id}>
                    <input
                        className="form-check-input"
                        type="radio"
                        name={"answer-" + id}
                        value={x.text}
                        onChange={this.handleAnswer}
                        checked={x.text === this.state["answer-" + id]}
                    />
                    <label className="form-check-label">{x.text}</label>
                </div>
            )
        })
    }

    getAnswerType(answer) {
        switch (answer.type) {
            case "option":
                return this.getOption(answer.option, answer.id);
            case "textarea":
                return this.getTextarea(answer.id);
            case "slider":
                return this.getSlider(answer);
            default:
                return this.getInput(answer.id);
        }
    }

    showIntro(text) {
        return (
            <div className="card card-success">
                <div className="card-header text-bold">
                   {text}
                </div>
            </div>
        )
    }

    render() {
        return this.props.value.questions.map(x => {
            let title = true;
            if (x.type === "slider") {
                title = false;
            }
            return (
                <div className={x.show ? "container-fluid" : "container-fluid hidden"} key={'question-' + x.id}>
                    <div className="row justify-content-center">
                        <div className="col-md-8">
                            { x.before === null ? "" : this.showIntro(x.before) }
                            <div className="card card-secondary card-outline">
                                <div className={title ? "card-header text-bold" : "hidden"}>
                                    {x.question}
                                </div>
                                <div className="card-body">
                                    {this.getAnswerType(x)}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            );
        });
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Cards);
