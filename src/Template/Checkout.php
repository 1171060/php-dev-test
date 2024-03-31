<?php

namespace silverorange\DevTest\Template;

use silverorange\DevTest\Context;

/**
 * Template for the checkout page
 */
class Checkout extends Layout
{
    protected function renderPage(Context $context): string
    {
        $content = $this->header->render($context);

        // @codingStandardsIgnoreStart
        return <<<HTML
                <form method="post" accept-charset="utf-8" action="checkout" class="form" novalidate="novalidate">
                    <div class="frame">
                        <h2 class="frame__title">Order Summary</h2>
                        <div class="frame__contents">
                            <table class="order-summary">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="product-image-container">
                                            <img src ="/highres-assets/product.jpg" alt="Product Image">
                                        </div></td>
                                        <td>Lorem Widget</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <div class="frame">
                         <div class="frame__contents checkbox-spacing">
                            <input type="checkbox" id="beta_program_checkbox" name="beta_program_checkbox">
                            <label for="beta_program_checkbox">Join our “Rise & Shine” beta program</label>
                            <p class="rise_shine_details">With our “Rise & Shine” beta program, you get early access to new features, but they may not always work perfectly. You can change your beta preference at any time after you join.</p>
                        </div>
                    </div>
                    <div class="frame">
                        <h2 class="frame__title">Account Details</h2>
                        <div class="frame__contents">
                            <div class="form-field form-field--required">
                                <label class="form-field__label" for="first_name">First Name: <span class="form-field__label-required"> (required)</span></label>
                                <div class="form-field__contents">
                                    <input type="text" name="first_name" id="first_name" class="entry" value="Michael" size="17" maxlength="255" />
                                </div>
                            </div>
                            <div class="form-field form-field--required">
                                <label class="form-field__label" for="last_name">Last Name: <span class="form-field__label-required"> (required)</span></label>
                                <div class="form-field__contents">
                                    <input type="text" name="last_name" id="last_name" class="entry" value="Gauthier" size="17" maxlength="255" />
                                </div>
                            </div>
                            <div class="form-field">
                                <label class="form-field__label" for="suffix">Suffix: </label>
                                <div class="form-field__contents">
                                    <input type="text" name="suffix" id="suffix" class="entry" value="" size="5" maxlength="255" />
                                </div>
                            </div>
                            <div class="form-field form-field--required">
                                <label class="form-field__label" for="email">Email: <span class="form-field__label-required"> (required)</span></label>
                                <div class="form-field__contents">
                                    <input type="email" name="email" id="email" class="entry entry--email" value="" size="50" maxlength="255" />
                                </div>
                                <div class="form-field__note">Your email address is used to sign into your account. We value your privacy and will not sell or share your email address.</div>
                            </div>
                        </div>
                    </div>
                    <div class="frame">
                        <h2 class="frame__title">Billing Address</h2>
                        <div class="frame__contents">
                            <div class="form-field form-field--required">
                                <label class="form-field__label" for="billing_address_first_name">First Name: <span class="form-field__label-required"> (required)</span></label>
                                <div class="form-field__contents">
                                    <input type="text" name="billing_address_first_name" id="billing_address_first_name" class="entry" value="Michael" size="17" maxlength="255" />
                                </div>
                            </div>
                            <div class="form-field form-field--required">
                                <label class="form-field__label" for="billing_address_last_name">Last Name: <span class="form-field__label-required"> (required)</span></label>
                                <div class="form-field__contents">
                                    <input type="text" name="billing_address_last_name" id="billing_address_last_name" class="entry" value="Gauthier" size="17" maxlength="255" />
                                </div>
                            </div>
                            <div class="form-field form-field--required">
                                <label class="form-field__label" for="billing_address_line1">Street Address: <span class="form-field__label-required"> (required)</span></label>
                                <div class="form-field__contents">
                                    <input type="text" name="billing_address_line1" id="billing_address_line1" class="entry" value="" size="35" maxlength="255" placeholder="Address Line 1" />
                                </div>
                            </div>
                             <div class="form-field form-field--required">
                                <div class="form-field__contents">
                                    <input type="text" name="billing_address_line2" id="billing_address_line2" class="entry" value="" size="35" maxlength="255"  placeholder="Address Line 2  (optional field)"/>
                                </div>
                            </div>
                            <div class="form-field form-field--required">
                                <label class="form-field__label" for="billing_address_city">City: <span class="form-field__label-required"> (required)</span></label>
                                <div class="form-field__contents">
                                    <input type="text" name="billing_address_city" id="billing_address_city" class="entry" value="" size="35" maxlength="255" />
                                </div>
                            </div>
                            <div class="form-field form-field--required">
                                <label class="form-field__label" for="billing_address_postalcode">ZIP/Postal Code: <span class="form-field__label-required"> (required)</span></label>
                                <div class="form-field__contents">
                                    <input type="text" name="billing_address_postalcode" id="billing_address_postalcode" class="entry entry--postal-code" value="" size="10" maxlength="50" />
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="frame">
                        <div class="submit-button-container">
                                <button type="submit" class="submit-button">Place Order</button>
                        </div>
                    </div>


                </form>
HTML;
        // @codingStandardsIgnoreEnd
    }
}
