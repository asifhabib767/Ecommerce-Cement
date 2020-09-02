import React from 'react';
import ReactDOM from 'react-dom';
import NumericInput from 'react-numeric-input';

class OtpComponent extends React.Component {

    state = {
        productLists: [],
        paymentMenthods: [],
        selectedPayment: null,
        deliveryLocationLists: [],
        phone_no: ''
    }

    componentDidMount() {
        this.getCartProductList();
        this.getDeliveryLocationList();
        this.getPaymentLists();
    }

    getCartProductList = () => {
        const productLists = [
            {
                id: 761,
                product_name: 'PCC',
                product_qty: 50,
                product_image: 'PCC',
                product_price: 0,
                price_range: '390-410',
            },
            {
                id: 760,
                product_name: 'OPC',
                product_qty: 50,
                product_image: 'OPC',
                product_price: 0,
                price_range: '420-440',
            }
        ];
        this.setState({
            productLists
        })
    }

    getDeliveryLocationList = () => {
        const deliveryLocationLists = [
            {
                product_id: 761,
                id: 1,
                name: 'Dhaka-Central, Gazipur',
                price: 400,
            },
            {
                product_id: 761,
                id: 1,
                name: 'Dhaka South, Jatrabari',
                price: 410,
            },
        ];
        this.setState({
            deliveryLocationLists
        })
    }

    getPaymentLists = () => {
        const paymentMenthods = [
            {
                id: 1,
                short_name: 'bank',
                name: 'Direct Bank Transfer',
                charge: 0,
            },
            {
                id: 2,
                short_name: 'bkash',
                name: 'bKash Payment',
                charge: 1.5,
            },
            {
                id: 3,
                short_name: 'card',
                name: 'Card Payment',
                charge: 2,
            }
        ];
        this.setState({
            paymentMenthods
        });
    }

    setPrice = (location, product_index) => {
        // Get the price for this location
        const products = this.state.productLists;
        const product = products[product_index];
        product.product_price = location.price;
        this.setState({
            productLists: products
        });
    }

    getTotalQty = () => {
        let total = 0;
        for (let i = 0; i < this.state.productLists.length; i++) {
            const item = this.state.productLists[i];
            total += item.product_qty;
        }
        return total;
    }

    getTotalSubtotal = () => {
        let total = 0;
        for (let i = 0; i < this.state.productLists.length; i++) {
            const item = this.state.productLists[i];
            total += item.product_qty * item.product_price;
        }
        return total;
    }

    changeProductQty = (qty, product_index) => {
        const products = this.state.productLists;
        const product = products[product_index];
        if (product.product_price === 0) {
            alert('Please select your delivery location');
            return false;
        }
        product.product_qty = qty;
        this.setState({
            productLists: products
        });
    }

    getCharge = () => {
        if (this.state.selectedPayment === null) {
            return 0;
        }

        let charge = parseFloat(this.getTotalSubtotal() * (this.state.selectedPayment.charge / 100));
        return charge;
    }

    setPaymentMethod = (payment, index) => {
        this.setState({
            selectedPayment: payment
        })
    }

    onSubmit = (e) => {

        alert('Enter:', this.state.phone_no);
        return false;
    }

    render() {
        return (
            <div>
                <div className="firstname mobile">
                    <label>Mobile Number:</label>
                    <input id="phone_no" className="form-control" type="number" required />
                    <small id="emailHelp" className="form-text text-muted"></small>
                </div>

                <div className="sendotpBTn">
                    <button type="button" className="productBtn sendbtn" onClick={this.onSubmit} >Send OTP</button>
                </div>


                <div className="firstname otptext ">
                    <label>Submit OTP:</label>
                    <input type="text" name="fname" value="" placeholder="4 digit PIN" />

                </div>

            </div>

        );
    }
}


export default OtpComponent;

if (document.getElementById('otp')) {
    ReactDOM.render(<OtpComponent />, document.getElementById('otp'));
}
