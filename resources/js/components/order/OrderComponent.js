import React from 'react';
import ReactDOM from 'react-dom';
import NumericInput from 'react-numeric-input';

class OrderComponent extends React.Component {

    state = {
        productLists: [],
        paymentMenthods: [],
        selectedPayment: null,
        deliveryLocationLists: []
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

    render() {
        return (
            <div className="OrderDetails">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-12 col-sm-12">
                            <div className="Ordertable">
                                <h2>Order Now</h2>
                                <table className="table table-bordered tablecolor">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {
                                            this.state.productLists.map((item, index) => (
                                                <tr key={index}>
                                                    <td> {item.product_name}<br />
                                                        <div className="dropdown">
                                                            <button className="btn btn-warning dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Select Delivery Location
                                                            </button>

                                                            <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                {
                                                                    this.state.deliveryLocationLists.map((location, index2) => (
                                                                        <a className="dropdown-item" onClick={() => this.setPrice(location, index)} key={index2}>{location.name}</a>
                                                                    ))
                                                                }
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <NumericInput required strict={true} mobile step={50} precision={0} value={item.product_qty} onChange={(e) => this.changeProductQty(e, index)} />
                                                    </td>
                                                    <td>{item.product_price} ‎৳</td>
                                                    <td>{item.product_qty * item.product_price} ‎৳</td>
                                                </tr>
                                            ))
                                        }

                                        <tr>
                                            <td>Total</td>
                                            <td>{this.getTotalQty()}</td>
                                            <td>-</td>
                                            <td>{this.getTotalSubtotal()} ‎৳</td>
                                        </tr>
                                        <tr>
                                            <td>Total Payable</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>{this.getTotalSubtotal() + this.getCharge()} ‎৳</td>
                                        </tr>

                                        {
                                            this.state.selectedPayment && this.state.selectedPayment.short_name === 'bkash' &&
                                            (
                                                <tr>
                                                    <td>Payment Method</td>
                                                    <td>{this.state.selectedPayment.name}</td>
                                                    <td colSpan={2}><button className="btn btn-primary">Pay Via bKash</button></td>
                                                </tr>
                                            )
                                        }

                                        {
                                            this.state.selectedPayment && this.state.selectedPayment.short_name === 'card' &&
                                            (
                                                <tr>
                                                    <td>Payment Method</td>
                                                    <td>{this.state.selectedPayment.name}</td>
                                                    <td colSpan={2}><button className="btn btn-info">Pay Via Card</button></td>
                                                </tr>
                                            )
                                        }

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div className="row mb-5">
                        <div className="col-lg-6 col-6">
                            <div className="orderBox">
                                <h2>Shipping Address</h2>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Full Name</label>
                                    <div className="col-md-6">
                                        <input className="form-control" />
                                    </div>
                                </div>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Phone Number</label>
                                    <div className="col-md-6">
                                        <input className="form-control" />
                                    </div>
                                </div>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Region</label>
                                    <div className="col-md-6">
                                        <select className="form-control">
                                            <option id="">Please Select..</option>
                                            <option id="">Dhaka</option>
                                            <option id="">Khulna</option>
                                        </select>
                                    </div>
                                </div>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">City</label>
                                    <div className="col-md-6">
                                        <select className="form-control">
                                            <option id="">Please Select..</option>
                                            <option id="">Dhaka</option>
                                            <option id="">Faridpur</option>
                                        </select>
                                    </div>
                                </div>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Area</label>
                                    <div className="col-md-6">
                                        <select className="form-control">
                                            <option id="">Please Select..</option>
                                            <option id="">Uttara</option>
                                            <option id="">Modhukhali</option>
                                        </select>
                                    </div>
                                </div>

                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Address</label>
                                    <div className="col-md-6">
                                        <input className="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 col-6">
                            <div className="orderBox">
                                <h2>Shipping Address</h2>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Full Name</label>
                                    <div className="col-md-6">
                                        <input className="form-control" />
                                    </div>
                                </div>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Phone Number</label>
                                    <div className="col-md-6">
                                        <input className="form-control" />
                                    </div>
                                </div>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Region</label>
                                    <div className="col-md-6">
                                        <select className="form-control">
                                            <option id="">Please Select..</option>
                                            <option id="">Dhaka</option>
                                            <option id="">Khulna</option>
                                        </select>
                                    </div>
                                </div>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">City</label>
                                    <div className="col-md-6">
                                        <select className="form-control">
                                            <option id="">Please Select..</option>
                                            <option id="">Dhaka</option>
                                            <option id="">Faridpur</option>
                                        </select>
                                    </div>
                                </div>
                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Area</label>
                                    <div className="col-md-6">
                                        <select className="form-control">
                                            <option id="">Please Select..</option>
                                            <option id="">Uttara</option>
                                            <option id="">Modhukhali</option>
                                        </select>
                                    </div>
                                </div>

                                <div className="form-group row">
                                    <label className="col-md-4 col-form-label text-md-right">Address</label>
                                    <div className="col-md-6">
                                        <input className="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="row mb-5">
                        <div className="col-lg-12 col-12">
                            <div className="orderBox">
                                <h2>Payment Method</h2>
                                <div className="dropdown">
                                    <p>Select a Payment Method:</p>
                                    <button className="btn btn-warning btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Payment Option
                                    </button>
                                    <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        {
                                            this.state.paymentMenthods.map((payment, index) => (
                                                <a className="dropdown-item" onClick={() => this.setPaymentMethod(payment, index)} key={index}>{payment.name}</a>
                                            ))
                                        }
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {
                        this.state.selectedPayment && this.state.selectedPayment.short_name === 'bank' &&
                        (
                            <div className="row mb-5">
                                <div className="col-lg-6">
                                    <div className="card card-body p-5">
                                        <h2>Direct Bank Transfer Information</h2>
                                        <div className="PaymentInfoDetails">
                                            <p>Bank Account Name: ACCL</p>
                                            <p>Bank Name: Dutch Bangla Bank Ltd.</p>
                                            <p>Bank Branch: Dhaka</p>
                                            <p>Bank Routing No: 1012012</p>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="card card-body p-2">
                                        <h2>Your Payment Information</h2>
                                        <div className="PaymentInfoDetails">
                                            <p>Bank Account Name: <input /></p>
                                            <p>Bank Name: <input /></p>
                                            <p>Bank Branch: <input /></p>
                                            <p>Bank Routing No: <input /></p>
                                        </div>
                                        <button className="productBtn payment">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        )
                    }
                </div>


            </div>
        );
    }
}


export default OrderComponent;

if (document.getElementById('order')) {
    ReactDOM.render(<OrderComponent />, document.getElementById('order'));
}
