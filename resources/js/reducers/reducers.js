const initialState = {
    sections: [{
            id: 1,
            text: "Loading...",
            visual: null,
            icon:"fas fa-stroopwafel fa-spin",
            show: true,
            complete: false
    }],
    questions: [{
        id: 1,
		section_id: 1,
        before: "Loading...",
		question: "Loading...",
		type: "text",
        show: true,
        answer: false
    }],
	submit: false,
	captcha: false,
	group: {
		id: 1,
		text: "Loading...",
		visual: null,
		icon:"fas fa-stroopwafel fa-spin",
		show: true,
		complete: false
	},
    page: 1
}

const showSection = (state, data, change) => {
    const page = change ? data : data.group;
    const content = change ? state : data;
    const section = content.sections.map((x) => {
        let show = false;
        let complete = change ? false : x.complete;
        if (x.id === page) {
            show = true;
        }
        return {...x, show: show, complete: complete};
    });
    const question = content.questions.map((x) => {
        let show = false;
        let answer = change ? false : x.answer;
        if (x.section_id === page) {
            show = true;
        }
        return {...x, show: show, answer: answer};
    });
	const group = section.find(x => x.show)
    return {
        ...state,
        sections: section,
        questions: question,
        page: page,
		group: group
    };
}

const reduceAnswer = (state, data) => {
    console.log(data)
    return state.map(x => {
        if (x.id === data.id) {
            x.answer = data.answer;
        }
        return x;
    });
}

export const question = (state = initialState, action) => {
    switch(action.type){
        case 'LOAD GROUP':
            return showSection(state, action.data, false)
        case 'CHANGE GROUP':
            return showSection(state, action.data, true)
        case 'REDUCE ANSWER':
            return {
                ...state,
                questions: reduceAnswer(state.questions, action.data)
            }
        case 'CHECK SUBMISSION':
            return {
                ...state,
            }
        case 'SUBMIT STATE':
            return {
                ...state,
            }
        default:
            return state;
    }
}
