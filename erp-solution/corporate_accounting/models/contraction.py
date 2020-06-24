# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Contraction(models.Model):
    _name = 'accounting.contraction'
    _description = 'Accounting Contraction Model'
    contraction_type_id = fields.Many2one(comodel='accounting.contraction.type', string='Type Name')
    contraction_document_ids = fields.Many2many('accounting.contraction.document', string='Contraction Document')
    contract_section_ids = fields.Many2many('accounting.standard.contract.section', string='Standard Contract Section')
class ContractionType(models.Model):
    _name = 'accounting.contraction.type'
    _description = 'Accounting Contraction Type Model'
    name = fields.Char('Type Name')
class ContractionDocument(models.Model):
    _name = 'accounting.contraction.document'
    _description = 'Accounting Contraction Document Model'
    document_id = fields.Many2one('accounting.document', string='Document')
    ref_document = fields.Char('References Document')
class StandardContractSection(models.Model):
    _name = 'accounting.standard.contract.section'
    _description = 'Accounting Contraction Document Model'
    _rec_name = 'title'
    title = fields.Char('Document Title')
    currency_ids = fields.Many2many('accounting.currency', string='Currency')
    payment_term = fields.Selection([
        ('pia','Payment in advance'),
        ('net7','Payment seven days after invoice date'),
        ('net10 ', 'Payment ten days after invoice date'),
        ('net30 ', 'Payment 30 days after invoice date'),
        ('net60 ', 'Payment 60 days after invoice date'),
        ('net90 ', 'Payment 90 days after invoice date'),
        ('eom ', 'End of month'),
        ('21mfi ', '21st of the month following invoice date'),
        ('cod ', 'Cash on delivery'),
        ('cnd ', 'Cash next delivery'),
        ('cbs ', 'Cash before shipment'),
        ('cia ', 'Cash in advance'),
        ('cwo ', 'Cash with order'),
        ('stage_payment', 'Payment of agreed amounts at stage')
    ], 'Payment Term')
    discount_payment_term = fields.Selection([
        ('rebates','A refund mailed to the purchaser after a purchase'),
        ('accumulation_discounts','Discounts for large purchases'),
        ('disability_discount', 'Offer to customers with a disability'),
        ('discount_card','Issuing cards that give certain customers or any customer a discount'),
        ('educational_discount','Usually given to students, but may go to educators'),
        ('staff_discount','Offered to employees')
    ], 'Discount Payment Term')
    counter_party_id = fields.Many2one('accounting.transaction.parties', string='Counter Party')
    party_id = fields.Many2one('accounting.transaction.parties', string='Party')
    party_role = fields.Char('Role A')
    counnter_party_role = fields.Char('Role B')
    unique_contract_number = fields.Char('Unique Number and Date of Agreement')
    purpose = fields.Selection([
        ('sale','Sale'),
        ('ownership_transfer','Ownership transfer'),
        ('service ', 'Service ')
    ], 'Document Purpose')
    material_description = fields.Char('Material Description')
    effective_date = fields.Date()
    expiration_date = fields.Date()



    