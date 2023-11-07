import React, {
	Component
} from 'react'
import ReactDOM from 'react-dom'
import Style from './style.css'
import axios from 'axios'
const API_PATH = 'http://localhost/pruebaReact/feedback_ac.php';

class App extends Component {
	
	onSubmit(event) {
		event.preventDefault();
		//console.log(this.state);
		axios({
            method: 'post',
            url: API_PATH,
            headers: {
                'content-type': 'application/json'
            },
            data: this.state
			})
		.then(result => {
			console.log(result.data)
			this.setState({
				dataSent: result.data.sent,
			})
			console.log(this.state)
		})
		.catch(error => this.setState({
			error: error.message
		}));
    }
    //Bind onSubmit(e)
    //function to the component.
    //this.onSubmit = this.onSubmit.bind(this);
	constructor(props) {
		super(props)
		this.state = {
			name: '',
			email: '',
			feedback: ''
		}
	}

	render() {
		return (
			//jsx code for the feedback form goes here.
			<div className="container">
			   <div className="box heading">
				  <h1>EAT, DINE & <br/>DRINK</h1>
			   </div>
			   <div className=" box feedback-form">
			   {this.state.dataSent ? 
				<p className="msg">
				   SUCCESS<br/><br/>
				   Thanks for submitting your feedback.<br/>
				   We appreciate your time.
			   </p>:<noscript></noscript>}
				  <p className="grey">SEND US YOUR FEEDBACK</p>
				  <div className="inputstyle">
					 <input type="text"
						placeholder="Enter your Name"
						value={this.state.name}
						onChange={e => this.setState({ name: e.target.value })}
						/>
				  </div>
					<div className="inputstyle">
					   <input type="text"
						  placeholder="Enter your Email"
						  value={this.state.email}
						  onChange={e => this.setState({ email: e.target.value })}
					   />
					</div>
					<div className="inputstyle">
					   <textarea placeholder="Your message goes here"
						  value={this.state.feedback}
						  onChange={e => this.setState({ feedback: e.target.value })}
					   ></textarea>
					</div>
				  <div className="btnstyle">
					<input type="submit"
					   value = "Send"
					   onClick={e => this.onSubmit(e)}
					/>
				  </div>
			   </div>
			   </div>	
		)
	}
}
export default App;